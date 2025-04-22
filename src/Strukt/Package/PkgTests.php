<?php

namespace Strukt\Package;

/**
* @author Moderator <pitsolu@gmail.com>
*/
class PkgTests implements \Strukt\Framework\Contract\Package{

	private $manifest;


	public function __construct(){

		$this->manifest = array(

			"cmd_name"=>"PhpUnit",
			"package"=>"pkg-tests",
			"files"=>array(

				"lib/App/Command/Tests/Exec.php",
				"lib/App/Command/Tests/ListCmd.php"
			)
		);
	}

	/**
	 * @return void
	 */
	public function preInstall():void{
		
		//
	}

	/**
	 * @param string $type
	 * 
	 * @return array
	 */
	public function getSettings(string $type):array{

		$settings = array(

			"App:Cli"=>array(

				"commands"=>array(

					\App\Command\Tests\Exec::class,
					\App\Command\Tests\ListCmd::class
				)
			),
			"App:Idx"=>[]
		);

		return $settings[$type];
	}

	/**
	 * @return string
	 */
	public function getName():string{

		return $this->manifest["package"];
	}

	/**
	 * @return string
	 */
	public function getCmdName():string{

		return $this->manifest["cmd_name"];
	}

	/**
	 * @return array|null
	 */
	public function getFiles():array|null{

		return $this->manifest["files"];
	}

	/**
	 * @return array|null
	 */
	public function getModules():array|null{

		return null;
	}

	/**
	* Use php's class_exists function to identify a class that indicated your package is installed
	* 
	* @return bool
	*/
	public function isPublished():bool{

		return class_exists(\App\Command\Tests\Exec::class);
	}

	/**
	 * @return array|null
	 */
	public function getRequirements():array|null{
		
		return null;
	}

	/**
	 * @return void
	 */
	public function postInstall():void{

		//
	}

	/**
	 * @return bool
	 */
	public function remove():bool{

		raise("Unimplemented!");
	}
}