<?php
namespace ClgView;

use Exception;
use ClgView\ClgOutput;
use ClgView\Parser\ClgParser;

class ClgView {
    private ClgOutput $ClgOutput;
    private ClgParser $ClgParser;
    private array $outputOptions = [];
    private array $parsedItems = [];
    /**
     * @param $filePath
     */
    public function __construct(string $filePath, array|null $options)
    {
        $this->ClgParser = new ClgParser($filePath);
        if ($options)
            $this->outputOptions = $options;
    }

    public function parse():void {
        $this->parsedItems = $this->ClgParser->parse();

        if(empty($this->parsedItems))
        {
            throw new Exception('No item were parsed');
        }

        $this->ClgOutput = new ClgOutput($this->parsedItems, $this->outputOptions);
        $this->ClgOutput->output();
    }
}
?>
