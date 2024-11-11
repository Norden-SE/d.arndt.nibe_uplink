<?php

// Klassendefinition
class Nibe_F750 extends IPSModule {
    // Überschreibt die interne IPS_Create($id) Funktion
    public function Create() {
        // Diese Zeile nicht löschen.
        parent::Create();

        $this->RegisterVariableFloat("Raumtemperatur", "Raumtemperatur", "", 0);
        $this->EnableAction("ActionVariable");
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
    public function MeineErsteEigeneFunktion() {
        // Selbsterstellter Code
    }
}