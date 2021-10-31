<?php
if (empty($_SESSION["status"]) && empty($_SESSION["employee_name"])) {
    header("location: ?p=feedback");
    exit();
}

if (empty($_SESSION["overall_rating"]) && empty($_SESSION["employee_status"] && $_SESSION["job_title"]) && empty($_SESSION["review_headline"] && $_SESSION["pros"]) && empty($_SESSION["cons"] && $_SESSION["advice_management"])) {
    header("location: ?p=step2");
    exit();
}

if (isset($_POST["pre"])) {
    header("location: ?p=step2");
    exit();
}

if (isset($_POST["sub"])) {
    $proofErr = $tacErr = "";

    $_SESSION["proof_tmp"] = $_FILES["proof"]["tmp_name"];
    $_SESSION["proof_name"] = $_FILES["proof"]["name"];
    $_SESSION["proof_size"] = $_FILES["proof"]["size"];
    echo $_SESSION["proof_size"];

    $tac = $_POST["tac"];

    if (empty($_SESSION["proof_name"])) {
        $proofErr = "Please select pdf or doc file.";
    }

    if (!empty($tac)) {
        $_SESSION["ext"] = pathinfo($_SESSION["proof_name"], PATHINFO_EXTENSION);
        if ($_SESSION["ext"] === "doc" || $_SESSION["ext"] === "pdf") {
            if ($_SESSION["proof_size"] > 10000000) {
                $proofErr = "Maximum File size should be 10Mb";
            } else {
                $_SESSION["file_path"] = "attach-" . rand() . "-" . time() . "." . $_SESSION["ext"];
                if (move_uploaded_file($_SESSION["proof_tmp"], "uploads/" . $_SESSION["file_path"])) {
                    header("location: ?p=review");
                } else {
                    $proofErr = "File Upload falied.";
                }
            }
        } else {
            $proofErr = "File format can only be pdf or doc.";
        }
    } 
     else {
        $tacErr = "You need to agree with terms and conditions.";
    }
}
?>
<style>
    .p2{
        box-shadow: 5px 5px 10px black;
        width: 400px;
    }
</style>

<div class="container my-5 pt-5">
    <form action="" method="POST" class="form-si p-4 bg-white p2" enctype="multipart/form-data">
        <h3 class="text-muted mb-4">Step 3:</h3>
        <div class="form-group">
            <label for="name">Submit Proof</label>
            <input type="file" class="form-control" id="proof" name="proof" value="<?php echo $_SESSION["proof_name"]; ?>">
            <small id="employee_status" class="form-text text-danger"><?php echo $proofErr; ?></small>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agree" name="tac" value="checked" <?php
                                                                                                        if (!empty($tac)) {
                                                                                                            echo "checked";
                                                                                                        }
                                                                                                        ?>>
                <label class="form-check-label" for="agree">Agree Terms and Conditions <a href="" data-toggle="modal" data-target="#exampleModalLong"></a> </label>
            </div>
            <small id="employee_status" class="form-text text-danger"><?php echo $tacErr; ?></small>
        </div>
        <div class="row">
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-dark btn-block" name="pre">Previous</button>
            </div>
            <div class="col-sm mb-2">
                <button type="submit" class="btn btn-danger btn-block" name="sub">Upload File</button>
            </div>
        </div>
    </form>

</div>

        </div>
    </div>
</div>