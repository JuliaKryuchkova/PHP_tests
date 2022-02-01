<?php

class GetUsersAllCest
{
    // tests
    public function getAllUsersViaAPI(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('user/get', []);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
    }
}
