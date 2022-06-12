<?php

namespace helpers;

class Logger
{
    public static function log($msg) {
        if(!is_dir("logs")) {
            mkdir('logs');
        }
        $f = fopen ('logs/main_' . date('Y_m_d'), 'a');
        fwrite($f, date('H:i:s') . ' -> ' . $msg . PHP_EOL);
        fclose($f);
        
    }

    public static function debug($msg) {


        if(!is_dir("logs")) {
            mkdir('logs');
        }
        
        # get backtrace and reverse the steps (first one first, last one last)
        $trace = debug_backtrace();
        $trace = array_reverse($trace, true);

        # get last position before logger
        $last_trace = $trace[0];
        
        $f = fopen ('logs/debug_' . date('Y_m_d'), 'a');
        fwrite($f, date('H:i:s') . ' -> ' . $msg . PHP_EOL . '------------------' . PHP_EOL);
        $last_function = "index.php";
        $args = "";
        foreach ($trace as $key => $e) {
            
            foreach ($e['args'] as $argskey => $argsvalue) {
                $args = $args . $argsvalue . ", ";
            }
            
            $line = $e['file'] . " - Line " . $e['line'] . ": " . $e['class'] . $e['type'] . $e['function'] . "('" . substr($args, 0, -2) . "')";
            $last_function = $e['class'] . $e['type'] . $e['function'];
            fwrite($f, $line . PHP_EOL);
        }

        
        fwrite($f, '-----------------------------------------' . PHP_EOL);
        fclose($f);
        
    }

    public static function error($msg) {


        if(!is_dir("logs")) {
            mkdir('logs');
        }
        
        # get backtrace and reverse the steps (first one first, last one last)
        $trace = debug_backtrace();
        $trace = array_reverse($trace, true);

        # get last position before logger
        $last_trace = $trace[0];
        
        $f = fopen ('logs/debug_' . date('Y_m_d'), 'a');
        fwrite($f, date('H:i:s') . ' -> ' . $msg . PHP_EOL . '------------------' . PHP_EOL);
        
        $args = "";
        \array_pop($trace);
        foreach ($trace as $key => $e) {
            
            foreach ($e['args'] as $argskey => $argsvalue) {
                $args = $args . print_r($argsvalue,1) . ", ";
            }
            
            $line = $e['file'] . " - Line " . $e['line'] . ": " . @$e['class'] . @$e['type'] . $e['function'] . "('" . substr($args, 0, -2) . "')";
            fwrite($f, $line . PHP_EOL);
            $msg_line[] = $line;
        }

        fwrite($f, '-----------------------------------------' . PHP_EOL);
        fclose($f);
        \array_pop($msg_line);
        $msg_line = array_reverse($msg_line, true);
?>

        <div class ="container p-2 mb-2 bg-dark text-white"><h1>ERROR</h1>
            <span class="bg-danger text-white"><?= date('H:i:s') . ' -> ' . $msg; ?> </span>
            <hr>
            Trace:<br>
            <?php 
                foreach ($msg_line as $line)
                {
                    echo $line . "<br>";
                }
            ?>
        </div>
<?php
    }
}