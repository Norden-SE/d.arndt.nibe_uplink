<?php

// Klassendefinition
class Nibe_F750 extends IPSModule {
    // Überschreibt die interne IPS_Create($id) Funktion
    public function Create() {
        // Diese Zeile nicht löschen.
        parent::Create();

        $this->RegisterVariableFloat("Raumtemperatur", "Raumtemperatur", "", 0);
        $this->RegisterVariableFloat("Aussentemperatur", "Außentemperatur", "", 0);
        $this->RegisterVariableInteger("Verdichterfrequenz", "Verdichterfrequenz", "", 0);
        $this->RegisterVariableString("Verdichtersatus", "Verdichterstatus", "", 0);
        $this->RegisterVariableString("Zusatzheizung", "Zusatzheizung", "", 0);
    }
    
    public function RequestAction($Ident, $Value) {
        SetValue($this->GetIDForIdent($Ident), $Value);
    }
    
    public function UpdateParameter($Field, $Parameter, $Value) {
        $this->UpdateFormField($Field, $Parameter, $Value);
    }

    public function SetInvalid() {
        $this->UpdateFormField('Label', 'caption', 'invalid'); // nicht ok
    }
    
    public function Reload() {
        $this->ReloadForm();
    }

    // Überschreibt die intere IPS_ApplyChanges($id) Funktion
    public function ApplyChanges() {
        // Diese Zeile nicht löschen
        parent::ApplyChanges();
    }
    /**
    * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
    * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
    *
    * ABC_MeineErsteEigeneFunktion($id);
    *
    */

    public function fetch_data() {
        $data = NIB_Request(@IPS_GetObjectIDByName("Nibe_uplink", $ParentID),"https://api.myuplink.com/v2/devices/emmy-r-104101-20240219-06601513219020-00-04-a3-f0-74-89/points");
        $json = json_decode($data,true);
        print_r($json);
    }
}