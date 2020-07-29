<?php

namespace App\Traits;

use App\Models\Approval;

trait HasApprovals
{

    public function disapprove()
    {
        return $this->approval()->first()->update(['is_approved'=>0]);
    }

    public function approve()
    {
        if($this->isNotApproved())
            $this->approvals()->create([
                'approved_by' => auth()->id(),
            ]);
        return;
    }

    public function isNotApproved()
    {
        return !$this->isApproved();
    }

    public function isApproved()
    {
        if($this->relationLoaded('approvals'))
            return $this->approvals->where('is_approved',1)->count() > 0;
        if($this->relationLoaded('approval'))
            return $this->approval->count() > 0;
        return $this->approval()->exists();
    }

    public function approval()
    {
        return $this->approvals()->where('is_approved',1);
    }

    public function approvals()
    {
        return $this->morphMany(Approval::class,'approvable');
    }

    public function approvalStatus()
    {
        if($this->relationLoaded('approval'))
            return $this->approval->first();
        return $this->approval()->first();
    }

}