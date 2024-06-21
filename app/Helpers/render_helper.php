<?php
// 트롤러에서 페이지를 불러올때마다 이 함수를 이용해서 페이지를 불러야한다
if ( ! function_exists('render'))
{
    function render(string $name, array $data = [], array $options = [])
    {
        return view(
            'layout',
            [
                'content' => view($name, $data, $options),
            ],
            $options
        );
    }
}