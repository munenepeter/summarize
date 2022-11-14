<?php

use Sum\Core\Request;



/**
 * checkCreateView
 * 
 * Create a view for route if it does not exist
 * 
 * @param String $view view to be created
 * 
 * @return Void
 */
function checkView(string $filename) {
    if (!file_exists($filename)) {

        if (ENV === 'production') {
            throw new \Exception("The requested view is missing", 404);
            exit;
        }
        fopen("$filename", 'a');

        $data = "<?php include_once 'base.view.php';?><div class=\"grid place-items-center h-screen\">
       Created {$filename}'s view; please edit</div>";

        file_put_contents($filename, $data);
    }
}

/**
 * View
 * 
 * Loads a specified file along with its data
 * 
 * @param String $filename Page to displayed
 * @param Array $data Data to be passed along
 * 
 * @return Require view
 */
function view(string $filename, array $data = []) {
    extract($data);
    $filename = "Views/{$filename}.view.php";

    checkView($filename);

    return require $filename;
}

/**
 * Redirect
 * 
 * Redirects to a give page
 * 
 * @param String $path Page to be redirected to
 */
function redirect(string $path) {
    header("location:{$path}");
}
/**
 * Abort
 * 
 * Kills the execution of the script & diplays error page
 * 
 * @param String $message The exception/error msg
 * @param Int $code Status code passed with the exception
 * 
 * @return File view
 */
function abort($message, $code) {

    if ($code === 0) {
        $code = 500;
        http_response_code(500);
    } elseif (is_string($code)) {
        http_response_code(500);
    } elseif ($code === "") {
        $code =  substr($message, -5, strpos($message, '!'));
        http_response_code(500);
    } else {
        http_response_code($code);
    }
    view('error', [
        'code' => $code,
        'message' => $message
    ]);
    exit;
}

function redirectback($data = []) {
    extract($data);
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
        redirect($_SERVER['HTTP_REFERER']);
    }
    $back = (new Request)->form('back');
    if (!$back) {
        redirect('/');
    }
    redirect($back);
}




/**
 * plural
 * This returns the plural version of common english words
 * --from stackoverflow
 * 
 * @param string $phrase the word to be pluralised
 * @param int $value 
 * 
 * @return string plural 
 */




/**
 * dd
 * 
 * dump the results & die
 * 
 * @param Mixed $data view to be created
 * 
 * @return String
 */

function dd($var) {
    //to do
    // debug_print_backtrace();

    ini_set("highlight.keyword", "#a50000;  font-weight: bolder");
    ini_set("highlight.string", "#5825b6; font-weight: lighter; ");

    ob_start();
    highlight_string("<?php\n" . var_export($var, true) . "?>");
    $highlighted_output = ob_get_clean();

    $highlighted_output = str_replace(["&lt;?php", "?&gt;"], '', $highlighted_output);

    echo $highlighted_output;
    die();
}

function format_date($date) {
    return date("jS M Y ", strtotime($date));
}

function time_ago($datetime, $full = false) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
/**
 * asset helper
 * 
 * @param $dir director to be returned in respect to the static dir
 * 
 * @return String Path to the requested resource
 */

function get_perc($total, $number) {
    if ($total > 0) {
        return round(($number * 100) / $total, 2);
    } else {
        return 0;
    }
}
