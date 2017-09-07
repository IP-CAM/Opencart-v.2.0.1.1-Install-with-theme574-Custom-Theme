/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://idevy.ru/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://idevy.ru/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'http://idevy.ru/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://idevy.ru/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://idevy.ru/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'http://idevy.ru/kcfinder/upload.php?opener=ckeditor&type=flash';
   config.protectedSource.push( /<script[\s\S]*?script>/g ); /* script tags */
	config.allowedContent = true; /* all tags */
};
