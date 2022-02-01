<?php

class GetUserCest
{
    // tests
    public function getUserViaAPI(ApiTester $I)
    {
        global $values;
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('user/get', [
            'username' => $values
        ]);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(array('username' => $values, 'email' => $values));
    }
}
