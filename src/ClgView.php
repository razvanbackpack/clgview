<?php
namespace ClgView;

use Exception;
use ClgView\ClgOutput;
use ClgView\Parser\ClgParser;

class ClgView {
    private ClgOutput $ClgOutput;
    private ClgParser $ClgParser;
    private array $parsedItems = [];
    /**
     * @param $filePath
     */
    public function __construct(string $filePath)
    {
        $this->ClgParser = new ClgParser($filePath);
    }

    public function parse():void {
        $this->parsedItems = $this->ClgParser->parse();

        if(empty($this->parsedItems))
        {
            throw new Exception('No item were parsed');
        }

        $this->ClgOutput = new ClgOutput($this->parsedItems);
        $this->ClgOutput->output();
    }
}
?>
