<?php

class Stack {
    private $stack;

    public function __construct() {
        $this->stack = [];
    }

    public function push($data) {
        array_push($this->stack, $data);
        echo "データ {$data} をスタックに追加しました。\n";
    }

    public function pop() {
        if (!$this->isEmpty()) {
            $data = array_pop($this->stack);
            echo "データ {$data} をスタックから削除しました。\n";
        } else {
            echo "スタックは空です。\n";
        }
    }

    public function peek() {
        if (!$this->isEmpty()) {
            $data = end($this->stack);
            echo "スタックのトップのデータは {$data} です。\n";
        } else {
            echo "スタックは空です。\n";
        }
    }

    public function isEmpty() {
        $isEmpty = empty($this->stack);
        if ($isEmpty) {
            echo "スタックは空です。\n";
        } else {
            echo "スタックにはデータがあります。\n";
        }
        return $isEmpty;
    }
}

function getInput($message) {
    echo $message . ": ";
    return trim(fgets(STDIN));
}

function main() {
    $stack = new Stack();

    while (true) {
        echo "\nモードを選択してください:\n";
        echo "1: Push, 2: Pop, 3: Peek, 4: IsEmpty\n";
        $mode = getInput("モード");

        switch ($mode) {
            case '1':
                $data = getInput("スタックに追加するデータを入力してください");
                $stack->push($data);
                break;
            case '2':
                $stack->pop();
                break;
            case '3':
                $stack->peek();
                break;
            case '4':
                $stack->isEmpty();
                break;
            default:
                echo "無効な入力です。再度選択してください。\n";
        }
    }
}

main();

?>
