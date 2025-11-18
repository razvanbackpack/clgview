<?php
namespace ClgView;

class ClgOutput {
    private array $items = [];
    private array $options = [
        'tab' => '&nbsp;&nbsp;&nbsp;',
    ];

    /**
     * @param $parsedItems array
     */
    public function __construct(array $parsedItems)
    {
        $this->items = $parsedItems;
    }

    public function output(): void {

        foreach($this->items as $item)
        {
            if($item['type'] == 'header')
            {

                if($item['level'] == 1) {
                    echo sprintf('%s%s%s', '<h2>', $item['text'], '</h2>');
                }
            }

            if ($item['type'] == 'list') {
                echo '<div style="display:flex;">';
                echo sprintf('%s%s%s',
                            '<div style="flex: 0.5">',
                            $item['level'] == 0 ? $item['marker'] : '',
                            '</div>');

                echo sprintf('%s%s%s%s',
                            '<div style="flex: 2">',
                            str_repeat($this->options['tab'], $item['level']),
                            $item['text'],
                            '</div>');
                echo '</div>';
            }
            // print_r($item);
        }
    }
}
