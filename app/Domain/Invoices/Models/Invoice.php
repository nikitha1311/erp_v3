<?php

namespace App\Domain\Invoices\Models;

use App\Domain\Customers\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Domain\Constant;

use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Invoice extends Model implements AuditableContract
{
    use CreatedBy, Auditable, SoftDeletes;

    protected $guarded=['id'];

    protected $dates = ['date'];

    public function id()
    {
        return "INV#" . $this->id;
    }

    public static function generateNumber()
    {
//        dd(static::class);
        $constant = Constant::whereModel(static::class)->first();
        $constant->increment('number');
        return $constant->prefix . $constant->number;
    }
    public function rows()
    {
        return $this->hasMany(InvoiceRow::class);
    }
    public function credits()
    {
        return $this->hasMany(InvoiceCredit::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function statuses()
    {
        return $this->hasMany(InvoiceStatus::class);
    }

    public function status()
    {
        if ($this->relationLoaded('statuses'))
            return $this->statuses->sortByDesc('created_at')->first() ?? 'No Status';
        return $this->statuses()->latest()->first() ?? 'No Status';
    }

    public function isOpenForModification()
    {
        if (!$this->status())
            return true;
        return in_array($this->status(), ['No Status', 'Open for Modification']);
    }
    public function updateTotal()
    {
        $this->update([
            'total' => $this->rows()->with('transaction')->get()->sum('transaction.total')
        ]);
    }

    public function updateOutstanding()
    {
        $credits = $this->credits()->sum('amount');
        $this->update([
            'outstanding' => round($this->fresh()->total - $credits, 2),
        ]);
    }
}
