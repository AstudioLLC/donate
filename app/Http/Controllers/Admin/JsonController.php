<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Models\User;

class JsonController extends AdminBaseController
{
    public function index()
    {
        $test2 = [
            "donor_name" => "Donor name",
            "Donation amount" => "5000",
            "Donation date" => "2021-03-01T13:55:14",
            "Donation type" => "Donation type",
            "Program name" => "program",
            "Donations" => [
               [
                    "donation_date" => "2021-03-01T13:55:14",
                    "donation_child" => "Armen",
                    "donation_child_id" => "221",
                    "amount" => "1250",
               ],
               [
                    "donation_date" => "2021-04-01T13:55:14",
                    "donation_child" => "Valodia",
                    "donation_child_id" => "222",
                    "amount" => "3750",
               ]
            ]
        ];
        dd($test2);

        $test = $this->getAll();
        //dd($test);
        $items = User::query()->get();
        return response()->json($test, 200, [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    private function getAll()
    {
        $array = [
            'Donor name' => $this->getDonorName()
        ];
        return $array;
    }

    private function getDonorName()
    {
        return User::query()->where(['role' => UserRole::SPONSOR, 'active' => 1])->select('name')->pluck('name')->toArray();
    }

    private function makeArray()
    {
        $array = [
            'Donor name' => 'sponsor name',
            'Donation amount' => [
                'donation 1',
                'donation 2',
                'donation 3',
            ],
            'Donation date' => [
                'date 1',
                'date 2',
                'date 3',
            ],
            'Donation type' => [
                'type 1',
                'type 2',
                'type 3',
            ],
            'Program name' => [
                'sponsor program name 1',
                'sponsor program name 2',
                'sponsor program name 3',
            ],
            'First name' => 'same as Donor name',
            'Last name' => '---',
            'Last donation date' => 'last donation date for sponsor',
            //'Gender' => '---',
            'Employment' => '---',
            'Donor type' => 'corporate or not?',
            'Other' => '---',
            'Age' => 'sponsors age',
            'Living place' => 'sponsors country',
            'Monthly income' => '---',
            'Date of becoming donor' => 'registration date',
            //'Donation type' => '---',
            'Purpose of the donation' => '---',
            'Last donation amount' => 'last donaton amount for sponsor',
            'Total number of donations' => 'total number of donations for sponsor',
            'Annual donation amount' => 'yearly donation amount for sponsor',
            'Average amount of donations' => 'average amount of donations for sponsor',
            'Company name' => 'if sponsor corporate, then company name otherwise empty',
            'Number of Employees' => '---',
            'Field of activity' => '--- or we can put ther last activity date',
            'Company type' => '---',
            'Location' => '---',
            'Number of branches' => '---',
            'Location of branches' => '---',
            'Annual turnover' => '---',
            'CSR Availibility' => '---',
            'Phone number' => 'sponsors phone number',
            'Contact person' => 'if corporate donor',
            'Contact person phone number' => 'sponsor phone number',
            //'Date of becoming donor' => 'registration date',
            //'Last donation date' => 'last donation date for sponsor',
            //'Donation type' => [],
            //'Last donation amount' => 'last donaton amount for sponsor',
            //'Total number of donations' => 'total number of donations for sponsor',
            //'Annual donation amount' => 'yearly donation amount for sponsor',
            //'Average amount of donations' => 'average amount of donations for sponsor',
            'Child ID' => [
                'children_id 1',
                'children_id 2',
                'children_id 4',
            ],
            'Name' => [
                'children title_hy 1',
                'children title_hy 2',
                'children title_hy 3',
            ],
            'Surname' => '---',
            'Date of birth' => [
                'children date_of_birth 1',
                'children date_of_birth 2',
                'children date_of_birth 3',
            ],
            'Gender' => [
                'children gender 1',
                'children gender 2',
                'children gender 3',
            ],
            'Programs' => '---',
            'Education' => '---',
            'Reason for not attending' => '---',
            'Health problems' => '---',
            'Vulnerability criteria' => '---',
            'Family income' => '---',
            'needs' => [
                'children 1' => [
                    'need 1',
                    'need 2',
                    'need 3',
                ],
                'children 2' => [
                    'need 1',
                    'need 2',
                    'need 3',
                ],
                'children 3' => [
                    'need 1',
                    'need 2',
                    'need 3',
                ],
            ],
            'Childs educational problems' => '---',
            'AP' => '---',
            'Reasons for leaving program' => '---',
            'Sponsorship approach' => '---',
            'Community name' => '---',
            'Health monitoring date' => '---',
            'Health status' => '---',
            'Educational Monitoring date' => '---',
            'Education type' => '---',
            'Grade' => '---',
            'Attending education' => '---',
            'Parent information monitoring date' => '---',
            'arshav Name' => [
                'arshav 1',
                'arshav 2',
                'arshav 3',
            ],
            'Total income' => ''

        ];
    }

    private function clearedArray()
    {
        $array = [
            [
                'Donor name' => 'sponsor name',
                'Donation amount' => [
                    'donation 1',
                    'donation 2',
                    'donation 3',
                ],
                'Donation date' => [
                    'date 1',
                    'date 2',
                    'date 3',
                ],
                'Donation type' => [
                    'type 1',
                    'type 2',
                    'type 3',
                ],
                'Program name' => [
                    'sponsor program name 1',
                    'sponsor program name 2',
                    'sponsor program name 3',
                ],
                'First name' => 'same as Donor name',
                'Last donation date' => 'last donation date for sponsor',
                'Donor type' => 'corporate or not?',
                'Age' => 'sponsors age',
                'Living place' => 'sponsors country',
                'Date of becoming donor' => 'registration date',
                'Last donation amount' => 'last donaton amount for sponsor',
                'Total number of donations' => 'total number of donations for sponsor',
                'Annual donation amount' => 'yearly donation amount for sponsor',
                'Average amount of donations' => 'average amount of donations for sponsor',
                'Company name' => 'if sponsor corporate, then company name otherwise empty',
                'Field of activity' => '--- or we can put ther last activity date',
                'Phone number' => 'sponsors phone number',
                'Contact person' => 'if corporate donor',
                'Contact person phone number' => 'sponsor phone number',
                'Child ID' => [
                    'children_id 1',
                    'children_id 2',
                    'children_id 4',
                ],
                'Name' => [
                    'children title_hy 1',
                    'children title_hy 2',
                    'children title_hy 3',
                ],
                'Date of birth' => [
                    'children date_of_birth 1',
                    'children date_of_birth 2',
                    'children date_of_birth 3',
                ],
                'Gender' => [
                    'children gender 1',
                    'children gender 2',
                    'children gender 3',
                ],
                'needs' => [
                    'children 1' => [
                        'need 1',
                        'need 2',
                        'need 3',
                    ],
                    'children 2' => [
                        'need 1',
                        'need 2',
                        'need 3',
                    ],
                    'children 3' => [
                        'need 1',
                        'need 2',
                        'need 3',
                    ],
                ],
                'arshav Name' => [
                    'arshav 1',
                    'arshav 2',
                    'arshav 3',
                ],
                'Total income' => ''

            ],
            [],
            [],
            [],
            [],
        ];

        return $array;
    }
}
