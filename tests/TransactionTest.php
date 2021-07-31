<?php

class TransactionTest extends TestCase
{
    /**
     * /api/transactions [POST]
     */
    public function testShouldCreateTransaction(){

        $parameters = [
            'account_id'    => 1,
            'description'   => 'Additional paid in capital',
            'date'          => '2021-08-01',
            'amount'        => 1200.50
        ];

        $this->json('POST', 'api/transactions', $parameters)
            ->seeJson([
                'account_id'    => $parameters['account_id'],
                'description'   => $parameters['description'],
                'date'          => $parameters['date'],
                'amount'        => $parameters['amount']
        ]);
    }

}