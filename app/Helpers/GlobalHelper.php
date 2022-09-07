<?php

use Illuminate\Support\Str;

function module_title($string)
{
    $string = strtr($string, ['.' => ' - ', '-' => ' ']);
    return Str::title(preg_replace('/[^A-Za-z0-9\-]/', ' ', $string)); // Removes special chars.
}

if (!function_exists('store_url')) {
    function store_url($url = "", $link = true)
    {
        if ($link) {
            return (parse_url($url, PHP_URL_HOST)) ? html()->a($url, parse_url($url, PHP_URL_HOST))->attribute('target', '_blank') : "-";
        } else {
            return parse_url($url, PHP_URL_HOST);
        }
    }
}

function label($str = '')
{
    return ucwords(str_replace("_", " ", $str));
}

function buildTag($array)
{
    $tag = '';
    foreach ($array as $key => $value) {
        $tag .= $key . '="' . $value . '" ';
    }
    return $tag;
}

function jsonToTable($data)
{
    $table = '
      <table class="json-table" width="100%">
      ';
    foreach ($data as $key => $value) {
        $table .= '
          <tr valign="top">
          ';
        if (!is_numeric($key)) {
            $table .= '
              <td>
                  <strong>' . $key . ':</strong>
              </td>
              <td>
              ';
        } else {
            $table .= '
              <td colspan="2">
              ';
        }
        if (is_object($value) || is_array($value)) {
            $table .= jsonToTable($value);
        } else {
            $table .= $value;
        }
        $table .= '
              </td>
          </tr>
          ';
    }
    $table .= '
      </table>
      ';
    return $table;
}

function addressFormat($data, $type)
{
    $data = (array)$data;
    $return[] = $data[$type . '_address_line_1'];
    $return[] = $data[$type . '_address_line_2'];
    $return[] = $data[$type . '_province'];
    $return[] = $data[$type . '_city'];
    $return[] = $data[$type . '_zipcode'];
    return implode(" ", $return);
}

function userFormat($data, $type)
{
    $data = (array)$data;
    $return[] = $data[$type . '_address_line_1'];
    $return[] = $data[$type . '_address_line_2'];
    $return[] = $data[$type . '_province'];
    $return[] = $data[$type . '_city'];
    $return[] = $data[$type . '_zipcode'];
    return implode(" ", $return);
}

function notPermited($type = 'view')
{
    switch ($type) {
        default:
        case 'view':
            return view('errors.403');
            break;

        case 'input':
            flash('YOU DON\'T HAVE PERMISSION TO ACCESS ON THIS SERVER')->error();
            redirect('/');
            break;

        case 'json':
            $data['message'] = 'YOU DON\'T HAVE PERMISSION TO ACCESS ON THIS SERVER';
            $status = 403;
            return response()->json($data, $status);
            break;
    }
}

function spaceURL($path)
{
    return str_replace('https://', 'https://' . env('DO_SPACES_BUCKET') . '.', env('DO_SPACES_ENDPOINT')) . '/' . $path;
}

function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

function rand_color2() {
    $colors = ['#370987', '#e75456', '#209e9b', '#eac06b', '#f66a43', '#3c6f7b', '#3c73d3'];
    return $colors[array_rand($colors)];
}