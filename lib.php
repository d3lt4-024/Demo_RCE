<?php

class CrewMate
{
    public $name;
    public $secret_number;
}

function scan()
{
    $numb = rand(0, 9);
    $name = strtoupper(substr($_SESSION["user"], 0, 4));
    print("ID: " . $name . $numb . "<br>");
    print("HT: " . rand(0, 9) . "'" . rand(0, 9) . "\"<br>");
    print("WT: " . rand(80, 100) . "lb<br>");
    print("C: " . ucfirst($_SESSION["user"]));
}

function download()
{
    if (isset($_SESSION["link"]) && !empty($_SESSION["link"])) {

        print('<a href="' . $_SESSION["link"] . '" download>
        <button id="test" hidden>a</button>
    </a>');
        print('<input type="submit" name="download_file" onclick="move2()" value="Download">');
    }
}


function upload($file)
{
    if (isset($file)) {
        if ($file["size"] > 1485760) {
            die('<center>IMPOSTOR ALERT!!!</center>');
        }
        $uploadfile = $file["tmp_name"];
        $folder = "crew_upload/";
        $file_name = $file["name"];
        $new = $file["tmp_name"] . $file_name;
        move_uploaded_file($file["tmp_name"], $new);
        $zip = new ZipArchive();
        $zip_name = "crew_upload/" . md5(uniqid(rand(), true)) . ".zip"; // Zip name
        if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE) {
            echo "Sorry ZIP creation failed at this time";
        }
        $zip->addFile($new);
        $zip->close();
        if (isset($_SESSION["link"]) && !empty($_SESSION["link"])) {
            unlink($_SESSION["link"]);
            unset($_SESSION["link"]);
        }
        $_SESSION["link"] = $zip_name;
        header("Refresh: 0");
    }
}

function check_user_exists($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $res = mysqli_query($conn, "SELECT * FROM User WHERE Username='$name'");
    return mysqli_num_rows($res);
}

function get_secret($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $res = mysqli_query($conn, "SELECT * FROM User WHERE Username='$name'");
    $row = mysqli_fetch_array($res);
    return intval($row['Secret_numb']);
}

function get_password($conn, $name)
{
    $name = mysqli_real_escape_string($conn, $name);
    $res = mysqli_query($conn, "SELECT * FROM User WHERE Username='$name'");
    $row = mysqli_fetch_array($res);
    return $row['Password'];
}

function check_length($input, $length)
{
    return strlen($input) == $length || count($input) == $length || sizeof($input) == $length;
}

function check_string($input)
{
    if (is_string($input)) {
        $input = str_replace(chr(0), chr(rand(33, 126)), $input);
        return hexdec(substr(bin2hex($input), 0, 10));
    }
    return $input;
}

function reset_password($conn, $name, $password)
{
    $name = mysqli_real_escape_string($conn, $name);
    $password = md5($password);
    $res = mysqli_query($conn, "UPDATE User SET Password='$password' WHERE Username='$name'");
}


?>
