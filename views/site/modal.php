<?php

    use phpnt\chartJS\ChartJs;

    /* @var $this yii\web\View */
    $data = $model->statisticOnData;

    $viewsData = [
        'labels'   => $data['labels'],
        'datasets' => [
            [
                'data'                      => $data['views'],
                'label'                     => "Views",
                'fill'                      => false,
                'lineTension'               => 0.1,
                'backgroundColor'           => "rgba(75,192,192,0.4)",
                'borderColor'               => "rgba(75,192,192,1)",
                'borderCapStyle'            => 'butt',
                'borderDash'                => [],
                'borderDashOffset'          => 0.0,
                'borderJoinStyle'           => 'miter',
                'pointBorderColor'          => "rgba(75,192,192,1)",
                'pointBackgroundColor'      => "#fff",
                'pointBorderWidth'          => 1,
                'pointHoverRadius'          => 5,
                'pointHoverBackgroundColor' => "rgba(75,192,192,1)",
                'pointHoverBorderColor'     => "rgba(220,220,220,1)",
                'pointHoverBorderWidth'     => 2,
                'pointRadius'               => 1,
                'pointHitRadius'            => 10,
                'spanGaps'                  => false,
            ],
        ],
    ];

    $commentsData = [
        'labels'   => $data['labels'],
        'datasets' => [
            [
                'data'                      => $data['comments'],
                'label'                     => "Comments",
                'fill'                      => false,
                'lineTension'               => 0.1,
                'backgroundColor'           => "rgba(75,192,192,0.4)",
                'borderColor'               => "rgba(75,192,192,1)",
                'borderCapStyle'            => 'butt',
                'borderDash'                => [],
                'borderDashOffset'          => 0.0,
                'borderJoinStyle'           => 'miter',
                'pointBorderColor'          => "rgba(75,192,192,1)",
                'pointBackgroundColor'      => "#fff",
                'pointBorderWidth'          => 1,
                'pointHoverRadius'          => 5,
                'pointHoverBackgroundColor' => "rgba(75,192,192,1)",
                'pointHoverBorderColor'     => "rgba(220,220,220,1)",
                'pointHoverBorderWidth'     => 2,
                'pointRadius'               => 1,
                'pointHitRadius'            => 10,
                'spanGaps'                  => false,
            ],
        ],
    ];
    $likesData = [
        'labels'   => $data['labels'],
        'datasets' => [
            [
                'data'             => $data['likes'],
                'label'            => "Likes",
                'fill'             => false,
                'lineTension'      => 0.1,
                'backgroundColor'  => "rgba(255,0,0,0.4)",
                'borderColor'      => "rgba(255,0,0,1)",
                'borderCapStyle'   => 'butt',
                'borderDash'       => [],
                'borderDashOffset' => 0.0,
                'borderJoinStyle'  => 'miter',
                'spanGaps'              => false,
            ],
        ],
    ];
    $dislikesData = [
        'labels'   => $data['labels'],
        'datasets' => [
            [
                'data'                  => $data['dislikes'],
                'label'                 => "Dislikes",
                'fill'                  => false,
                'lineTension'           => 0.1,
                'backgroundColor'       => "rgba(0,100,0,0.4)",
                'borderColor'           => "rgba(0,100,0,1)",
                'borderCapStyle'        => 'butt',
                'borderDash'            => [],
                'borderDashOffset'      => 0.0,
                'borderJoinStyle'       => 'miter',
                'spanGaps'              => false,
            ],
        ],
    ];
    echo \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label'   => 'Views',
                'content' => ChartJs::widget([
                    'type'    => ChartJs::TYPE_LINE,
                    'data'    => $viewsData,
                    'options' => [],
                ]),
                'active'  => true,
            ],
            [
                'label'   => 'Comments',
                'content' => ChartJs::widget([
                    'type'    => ChartJs::TYPE_LINE,
                    'data'    => $commentsData,
                    'options' => [],
                ]),
            ],
            [
                'label'   => 'Likes',
                'content' => ChartJs::widget([
                    'type'    => ChartJs::TYPE_LINE,
                    'data'    => $likesData,
                    'options' => [],
                ]),
            ],
            [
                'label'   => 'Dislikes',
                'content' => ChartJs::widget([
                    'type'    => ChartJs::TYPE_LINE,
                    'data'    => $dislikesData,
                    'options' => [],
                ]),
            ],
        ],
    ]);
?>

