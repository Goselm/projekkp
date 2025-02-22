<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pembayaran;
use App\Mail\PembayaranEmail;
use Illuminate\Support\Facades\Mail;
use App\Services\GmailService;

class SendMidnightEmail extends Command
{
    protected $signature = 'email:send-midnight';
    protected $description = 'Send payment emails to users';

    public function __construct(GmailService $gmailService)
    {
        parent::__construct();
        $this->gmailService = $gmailService;
    }

    public function handle(GmailService $gmailService)
    {
        $pembayarans = Pembayaran::all();

        foreach ($pembayarans as $pembayaran) {
            try {
                $to = $pembayaran->email;
                $subject = 'Tagihan Pembayaran';
                $body = "<p>Halo {$pembayaran->nama},<br>Tagihan Anda sebesar Rp{$pembayaran->biaya}.</p>";

                $gmailService->sendEmail($to, $subject, $body);
            } catch (\Exception $e) {
                $this->error("Gagal mengirim email ke {$pembayaran->email}: {$e->getMessage()}");
            }
        }

        $this->info('Semua email telah berhasil dikirim!');
    }
}
