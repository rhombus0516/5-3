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

class Queue {
    private $queue;

    public function __construct() {
        $this->queue = [];
    }

    public function enqueue($data) {
        array_push($this->queue, $data);
        echo "データ {$data} をキューに追加しました。\n";
    }

    public function dequeue() {
        if (!$this->isEmpty()) {
            $data = array_shift($this->queue);
            echo "データ {$data} をキューから削除しました。\n";
        } else {
            echo "キューは空です。\n";
        }
    }

    public function front() {
        if (!$this->isEmpty()) {
            $data = $this->queue[0];
            echo "キューのフロントのデータは {$data} です。\n";
        } else {
            echo "キューは空です。\n";
        }
    }

    public function isEmpty() {
        $isEmpty = empty($this->queue);
        if ($isEmpty) {
            echo "キューは空です。\n";
        } else {
            echo "キューにはデータがあります。\n";
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
    $queue = new Queue();

    while (true) {
        echo "\n操作を選択してください：\n";
        echo "1: スタック操作, 2: キュー操作\n";
        $operation = getInput("操作");

        if ($operation == '1') {
            while (true) {
                echo "\nスタックのモードを選択してください：\n";
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
        } elseif ($operation == '2') {
            while (true) {
                echo "\nキューのモードを選択してください：\n";
                echo "1: Enqueue, 2: Dequeue, 3: Front, 4: IsEmpty\n";
                $mode = getInput("モード");

                switch ($mode) {
                    case '1':
                        $data = getInput("キューに追加するデータを入力してください");
                        $queue->enqueue($data);
                        break;
                    case '2':
                        $queue->dequeue();
                        break;
                    case '3':
                        $queue->front();
                        break;
                    case '4':
                        $queue->isEmpty();
                        break;
                    default:
                        echo "無効な入力です。再度選択してください。\n";
                }
            }
        } else {
            echo "無効な入力です。再度選択してください。\n";
        }
    }
}

main();

?>