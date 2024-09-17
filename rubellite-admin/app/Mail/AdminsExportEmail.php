<?php

namespace App\Mail;

use App\Exports\AdminsExport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;

class AdminsExportEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $admins;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admins)
    {
        $this->admins = $admins;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachment = Excel::raw(new AdminsExport($this->admins), BaseExcel::XLSX);

        return $this->subject('Admins Export')
            ->html('Test: Admins Export')
            ->attachData($attachment, 'admins.xlsx');
    }
}
