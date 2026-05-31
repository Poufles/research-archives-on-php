<?php

/**
 * @param string $value
 * @param string $name
 * @param bool $isFilled
 * @param array $options
 */
function GenericFormButton($value, $name, $isFilled, $options = null)
{
    $options ??= [
        "type" => "submit",
        "paddingY" => "10px",
        "paddingX" => "20px",
    ];

    $filledStatus = "filled";
    if (!$isFilled) $filledStatus = "unfilled";
?>
    <input type="<?php echo $options["type"] ?>" name="<?php echo $name ?>" value="<?php echo $value ?>" class="component button form-generic-button <?php echo $filledStatus ?>">
<?php
};
