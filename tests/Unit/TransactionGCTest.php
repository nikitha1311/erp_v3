<?php

namespace Tests\Unit;

use App\Models\GoodsConsignmentNote;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionGCTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function transaction_has_gc()
    {
        $transaction = create(Transaction::class);
        $gc = create(GoodsConsignmentNote::class);

        $transaction->addGC($gc->id);
        $this->assertEquals(1, $transaction->goodsConsignmentNotes()->count());
    }

    /** @test */
    public function gc_of_one_transaction_isnt_shown_for_other_transactions()
    {
        [$TransA, $TransB] = create(Transaction::class,[],2);
        [$gcA, $gcB] = create(GoodsConsignmentNote::class,[],2);
        DB::insert('insert into `gcs_transactions` (`transaction_id`,`gc_id`) values ('.$TransA->id.','.$gcA->id.')');
        DB::insert('insert into `gcs_transactions` (`transaction_id`,`gc_id`) values ('.$TransB->id.','.$gcB->id.')');
        $this->assertEquals($gcA->id, $TransA->goodsConsignmentNotes->first()->id);
        $this->assertNotEquals($gcB->id, $TransA->goodsConsignmentNotes->first()->id);
        $this->assertEquals($gcB->id, $TransB->goodsConsignmentNotes->first()->id);
        $this->assertNotEquals($gcA->id, $TransB->goodsConsignmentNotes->first()->id);
    }
}
