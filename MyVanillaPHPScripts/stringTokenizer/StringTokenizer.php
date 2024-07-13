<?


class StringTokenizer
{

    private string $value;
    private string $currToken;
    private bool $tokenizationStarted;
    private string $pattern = " \n\t";

    public function __construct(string $value)
    {
        $this->value = $value;
        $this->tokenizationStarted = false;
        $this->currToken = "DUMMY";
    }

    public function nextToken(): string | null
    {

        if (!$this->tokenizationStarted) {
            $this->tokenizationStarted = true;
            $this->currToken = $this->tokenizeValue($this->value);
            return $this->currToken;
        }

        if ($this->tokenizationStarted) {
            $this->currToken = $this->tokenizeValue(null);
            return $this->currToken;
        }
    }

    private function tokenizeValue($arg): string | null
    {

        if ($arg == null) {
            return strtok($this->pattern);
        }

        return strtok($arg, $this->pattern);
    }

    public function hasNext() {
        return $this->currToken != null;
    }
}

$beautifulStr = new StringTokenizer("HELLO HELLOO@@ MY BEAUTIFUL WORLD!!!!");

printf("\n\n\n");

while($beautifulStr->hasNext()) {
    echo $beautifulStr->nextToken() . PHP_EOL;
}

$depressedStr = new StringTokenizer("HELLO@@ HELLOO@@ MY DEPRESSED WORLD!!!!");

while (($s = $depressedStr->nextToken()) != null) {
    echo $s . PHP_EOL;
}

printf("\n\n\n");