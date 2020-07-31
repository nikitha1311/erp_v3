<?php

namespace Tests\Unit;

use App\Domain\LHAs\Models\LoadingHireAgreement;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoadingHireAgreementsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function lha_has_a_type()
    {
        $lha = create(LoadingHireAgreement::class,[
            'type' => 0,
        ]);
        $this->assertEquals('Local',$lha->type());
        $lha->update([
           'type' => 1
        ]);
        $this->assertEquals('Full Trip',$lha->fresh()->type());
    }

    /** @test */
    public function lha_is_local()
    {
        $lha = create(LoadingHireAgreement::class,[
            'type' => 0,
        ]);
        $this->assertTrue($lha->isLocal());
    }

    /** @test */
    public function lha_is_full_trip()
    {
        $lha = create(LoadingHireAgreement::class,[
            'type' => 1,
        ]);
        $this->assertTrue($lha->isFullTrip());
    }



}
