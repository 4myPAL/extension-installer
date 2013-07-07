<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://www.arcavias.com/en/license
 */


namespace Arcavias\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;


/**
 * Custom installer for Arcavias extensions via composer
 */
class ExtensionInstaller extends LibraryInstaller
{
	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath( PackageInterface $package )
	{
		if( substr( $package->getPrettyName(), 0, 13 ) !== 'arcavias/ext-' )
		{
			throw new \InvalidArgumentException(
				'Unable to install extension, arcavias extensions '
				. 'should always start their package name with '
				. '"arcavias/ext-"'
			);
		}

		return 'ext/' . substr( $package->getPrettyName(), 13 );
	}


	/**
	 * {@inheritDoc}
	 */
	public function supports( $packageType )
	{
		return $packageType === 'arcavias-extension';
	}
}
