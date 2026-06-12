<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function reply(Request $request)
    {
        $request->validate([
            'messages' => 'required|array',
            'messages.*.role'    => 'required|in:user,assistant',
            'messages.*.content' => 'required|string|max:1000',
        ]);

        $systemPrompt = <<<PROMPT
Kamu adalah Asisten Selendang Puan — asisten virtual yang hangat, empatik, dan membantu untuk platform pelaporan kekerasan terhadap perempuan bernama Selendang Puan Dharma Ayu.

Tugasmu:
- Membantu pengguna memahami cara membuat laporan kekerasan
- Menjelaskan proses dan status laporan
- Memberikan informasi kontak darurat jika dibutuhkan
- Menjawab pertanyaan seputar platform dengan ramah dan jelas
- Memberikan dukungan emosional ringan jika pengguna terlihat membutuhkan

Informasi penting yang kamu tahu:
- Cara lapor: Klik "＋ Buat Laporan" di dashboard, isi formulir, lampirkan bukti, kirim
- Laporan bersifat anonim dan terenkripsi — identitas pengguna 100% terlindungi
- Waktu proses: verifikasi 1x24 jam, tindak lanjut 3-7 hari kerja
- Jenis kasus: kekerasan fisik, psikis, seksual, ekonomi, penelantaran, pelecehan
- Status laporan bisa dipantau di dashboard (Diterima → Verifikasi → Tindak Lanjut → Selesai)
- Kontak darurat: Hotline SAPA 119 ext 8, Komnas Perempuan (021) 390-3963, LBH APIK (021) 788-42580
- WhatsApp tim: 0817-7908-0524

Aturan penting:
- Selalu gunakan Bahasa Indonesia yang hangat dan mudah dipahami
- Jangan pernah meremehkan atau mempertanyakan pengalaman pengguna
- Jika ada tanda darurat atau bahaya, segera arahkan ke kontak darurat
- Jawaban singkat dan to the point — maksimal 3-4 kalimat kecuali perlu detail
- Jangan keluar dari topik platform dan keselamatan pengguna
PROMPT;

        $messages = collect($request->messages)->map(fn($m) => [
            'role'    => $m['role'],
            'content' => $m['content'],
        ])->toArray();

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->timeout(15)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'       => 'llama-3.1-8b-instant',
                'messages'    => array_merge(
                    [['role' => 'system', 'content' => $systemPrompt]],
                    $messages
                ),
                'max_tokens'  => 400,
                'temperature' => 0.7,
            ]);

            if ($response->failed()) {
                return response()->json(['error' => 'Gagal menghubungi asisten.'], 502);
            }

            $reply = $response->json('choices.0.message.content') ?? 'Maaf, tidak ada respons.';

            return response()->json(['reply' => $reply]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan. Coba lagi sebentar.'], 500);
        }
    }
}