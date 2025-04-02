<?php

return [
    'debug' => false,
    'panel' => [
        'install' => true
    ],
    'routes' => [
        [
            'pattern' => 'fetch-projects/(:num)',
            'method' => 'GET',
            'action'  => function ($pageNumber) {
                $projects = site()->pages()->listed()->paginate(4, ['page' => $pageNumber]);
                $html = '';

                foreach ($projects as $project) {
                    $thumbnail = $project->image('thumbnail.jpeg') ?? null;
                    $thumbnailUrl = $thumbnail ? $thumbnail->url() : '';

                    $html .= '<div class="is-flex-col project-block">';
                    $html .= '<div class="caption">' . $project->slug() . '</div>';
                    $html .= '<button class="button project-button" data-url="' . $project->url() . '" data-title="' . $project->title() . '" data-description="' . $project->description() .  '" data-img="' . $thumbnailUrl . '" data-sliceFrom="' . $project->slicefrom() . '" data-sliceTo="' . $project->sliceto() . '">';
                    if ($thumbnail) {
                        $html .= '<img src="' . $thumbnailUrl . '" alt="' . $project->title() . '" class="image">';
                    }
                    $html .= '</button>';
                    $html .= '<div class="caption" style="text-align: right">' . $project->title() . '</div>';
                    $html .= '</div>';
                }

                return json_encode([
                    'html' => $html,
                    'totalPages' => $projects->pagination()->pages() // Return total pages
                ]);
            }
        ],
    ]
];
