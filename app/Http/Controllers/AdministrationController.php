<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Service;

class AdministrationController extends Controller
{
    public function cash(Request $request)
    {
        $date = $request->date == 0 ? Date::now()->format('Y-m-d') : $request->date;

        $all = Service::whereBetween('date_out', [$date . ' 00:00:00', $date . ' 23:59:59'])
                            ->where('status', '!=', 'credito')->get();

        $tCash = $this->getTotal(Service::payType($date, 'Efectivo'));
        $tDebit = $this->getTotal(Service::payType($date, 'T. Debito'));
        $tCredit = $this->getTotal(Service::payType($date, 'T. Credito'));
        $tCheck = $this->getTotal(Service::payType($date, 'Cheque'));
        $tTransfer = $this->getTotal(Service::payType($date, 'Transferencia'));
        $total = $this->getTotal($all);

        return view('cash.balance', compact('date', 'all', 'tCash', 'tDebit', 'tCredit', 'tCheck', 'tTransfer','total'));
    }

    public function getTotal($services)
    {
        $total = 0;

        foreach ($services as $service) {
            $total += $service->total;
        }

        return $total;
    }
}
