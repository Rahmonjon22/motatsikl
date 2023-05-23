<?php
///////////////////////////////////////////////////////
// (c) copyright by FISCHER-CGD / G.Riedel 2006      //
//
//  functions:
//
//    void  CTemplate::CTemplate(string &$message="");
//    void  CTemplate::Show();
//    void  CTemplate::Load(string filename);
//    void   CTemplate::SetTemplate(string Template);
//    string  CTemplate::Get();
//    void Replace(string $key, string $replacement);
//    void ReplaceMap(array Map);  ( Element(Map) = array([key],[value]) )
//
//  defining Variable in a Template:
//
//    VAR:[variablenname]:[wert];
//
///////////////////////////////////////////////////////

class CTemplate {

	var $Template;

	function __construct() {
		$this->Template = "";
	}

	function Load($filename) {
		$this->ReadFile($filename, $this->Template);
	}

	function SetTemplate($Template) {
		$this->Template = $Template;
	}

	function Get() {
		return $this->Template;
	}

	function Replace($key, $value) {
		$this->Template = str_replace($key, $value, $this->Template);
	}

	function checkWildcard($wildcard) {
		return strpos($this->Template, $wildcard) ? TRUE : FALSE;
	}

	private function ReadFile($filename, &$istream) {
		if (file_exists($filename)) {
			if ($fp = fopen($filename, "r")) {
				flock($fp, 1);
				rewind($fp);
				$size = filesize($filename);
				if ($size > 0) {
					$istream = "";
					while (!feof($fp)) {
						$istream .= fgets($fp);
					}
				} else {
					$istream = "";
				}
				flock($fp, 3);
				fclose($fp);

				return TRUE;
			} else {
				throw new Exception("Error[CFile.read()]: Can't open file:" . $filename . "");
			}
		} else {
			throw new Exception("Error[CFile.read()]: File '" . $filename . "'. don't exists!");
		}
	}
}