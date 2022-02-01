<?php

class CreateUserCest
{
    // tests
    public function createUserViaAPI(\ApiTester $I)
    {
        global $values;
        $values = substr(str_shuffle('qwertyuioplkjhg123456789'), 0, 15).'тест';
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('user/create', [
            'username' => mb_convert_encoding($values, 'UTF-8'),
            'email' => mb_convert_encoding($values, 'UTF-8'),
            'password' => '1q2w3e'
        ]
        );
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(array('message' => 'User Successully created', 'success' => true));
    }
}
