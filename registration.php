<?php
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                exit;
        }

        // Posted values only go into plain-text mail bodies.
        function field($name) {
                $value = $_POST[$name] ?? '';
                return is_string($value) ? mb_substr(trim($value), 0, 500) : '';
        }

        $PrimaryParentName=field('PostPrimaryParentName');
        $SecondaryParentName=field('PostSecondaryParentName');
		$PrimaryEmail=field('PostPrimaryEmail');
        $SecondaryEmail=field('PostSecondaryEmail');
        $PrimaryPhone=field('PostPrimaryPhone');
        $SecondaryPhone=field('PostSecondaryPhone');
        $Address=field('PostAddress');
        $ChildName=field('PostChildName');
        $ChildBirth=field('PostChildBirth');
        $ChildAllergies=field('PostChildAllergies');
        $ChildSchool=field('PostChildSchool');
        $ChildLevel=field('PostChildLevel');
        $UniformSize=field('PostUniformSize');
        $PreferedPositions=field('PostPreferedPositions');
        $Competitive=field('PostCompetitive');

		$to='taha.rhidouani@gmail.com';
		$subject= 'Nouvelle inscription pour le CSEO';
		$message="CONTACT INFORMATION"."\n"."Primary parent's name: ".$PrimaryParentName."\n"."Primary parent's email: ".$PrimaryEmail."\n"."Primary parent's phone number: ".$PrimaryPhone."\n\n"."Secondary parent's name: ".$SecondaryParentName."\n"."Secondary parent's email: ".$SecondaryEmail."\n"."Secondary parent's phone number: ".$SecondaryPhone."\n\n"."Address: ".$Address."\n\n"."CHILD INFORMATION"."\n"."Child name: ".$ChildName."\n"."Child's date of birth: ".$ChildBirth."\n"."Allergies: ".$ChildAllergies."\n"."Child's school: ".$ChildSchool."\n"."Child's level of experience: ".$ChildLevel."\n"."Uniform size: ".$UniformSize."\n"."Prefered positions: ".$PreferedPositions."\n"."Section: ".$Competitive;

        mail($to, $subject, $message);

        $confirmation_subject="Welcome to CSEO";
        $confirmation_message="You have successfully registered ".$ChildName.". We can't wait to see you on the field!"."\n\n"."This is a automatic email. Please don't answer back.";

        // The confirmation goes to the primary parent's address, and only if it is one.
        if (filter_var($PrimaryEmail, FILTER_VALIDATE_EMAIL)) {
                mail($PrimaryEmail, $confirmation_subject, $confirmation_message);
        }
?>