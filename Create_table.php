<?php

    $cn=mysqli_connect("localhost","root","","final");

    $tab1="CREATE TABLE personal_info(
                                        FN varchar(25),
                                        LN varchar(20),
                                        Gender varchar(6),
                                        Adrs varchar(70),
                                        DOB date,
                                        Pro_Photo varchar(50),
                                        PhNo BIGINT(10) Primary Key
                                    )";
    if(mysqli_query($cn,$tab1))
    {
        echo "Table 1 Created with Primary Key...<hr>";
    }
    else
    {
        echo "Table 1 not created...<hr>";
    }

    $tab2="CREATE TABLE details(
                                    username varchar(30),
                                    Email varchar(30),
                                    pwd varchar(12),
                                    PhNo BIGINT(10),
                                    Foreign Key(PhNo) References personal_info(PhNo)
                                )";

    if(mysqli_query($cn,$tab2))
    {
        echo "Table 2 Created with Foreign Key...<hr>";
    }
    else
    {
        echo "Table 2 not created...<hr>";
    }

?>