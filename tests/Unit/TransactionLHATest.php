<?php

namespace Tests\Unit;

use App\Models\LoadingHireAgreement;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionLHATest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function transaction_has_lhas()
    {
        $transaction = create(Transaction::class);
        $lha = create(LoadingHireAgreement::class);

        $transaction->addLHA($lha->id);
        $this->assertEquals(1, $transaction->loadingHireAgreements()->count());
    }

    /** @test */
    public function lha_of_one_transaction_isnt_shown_for_other_transactions()
    {
        [$TransA, $TransB] = create(Transaction::class,[],2);
        [$LhaA, $LhaB] = create(LoadingHireAgreement::class,[],2);
        DB::insert('insert into `lhas_transactions` (`transaction_id`,`lha_id`) values ('.$TransA->id.','.$LhaA->id.')');
        DB::insert('insert into `lhas_transactions` (`transaction_id`,`lha_id`) values ('.$TransB->id.','.$LhaB->id.')');
        $this->assertEquals($LhaA->id, $TransA->loadingHireAgreements->first()->id);
        $this->assertNotEquals($LhaB->id, $TransA->loadingHireAgreements->first()->id);
        $this->assertEquals($LhaB->id, $TransB->loadingHireAgreements->first()->id);
        $this->assertNotEquals($LhaA->id, $TransB->loadingHireAgreements->first()->id);
    }
}
