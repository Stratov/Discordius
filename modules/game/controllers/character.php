<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

class Character_Controller extends Template_Controller {

		/**
		 * Methode : page du generateur de character
		 */
		public function index()
		{
            $this->auto_render = false;

            $v = new View('character/index');

            $v->hair = self::listing( 'hair' );
            $v->hairop = self::listing( 'hairop' );
            $v->option = self::listing( 'option' );
            $v->mante = self::listing( 'mante' );
            $v->body = self::listing( 'body' );
            $v->acce1 = self::listing( 'acce1' );
            $v->acce2 = self::listing( 'acce2' );
            $v->chmod_map = is_writable(DOCROOT.'images/character/');

            $v->render(true);
		}

		private function listing( $dir = false, $type = false )
		{
				if( ( $listing = file::listing_dir( DOCROOT.'admin/images/character/'.$dir.'/front' ) ) !== FALSE )
				{
						foreach( file::listing_dir( DOCROOT.'admin/images/character/'.$dir.'/front' ) as $key => $row )
								$data[] = array( 'front' => $row,
										'back' => file_exists( DOCROOT.'admin/images/character/'.$dir.'/back/'.$row ) ? $row : 'none.png',
										'top' => file_exists( DOCROOT.'admin/images/character/'.$dir.'/top/'.$row ) ? $row : 'none.png' );

						return $data;
				}

				return FALSE;
		}

		public function generate()
		{
				$this->auto_render = false;

				$imageList = $this->input->get( 'img' );

				$image = imagecreatetruecolor( 96, 128 );

				imagealphablending( $image, false );

				$col = imagecolorallocatealpha( $image, 0, 0, 255, 127 );

				imagefilledrectangle( $image, 0, 0, 96, 128, $col );

				imagealphablending( $image, true );
				imagealphablending( $image, false );
				imagesavealpha( $image, true );

				if( $imageList )
						foreach( $imageList as $row )
								imagecopy( $image, imagecreatefrompng( $row ), 0, 0, 0, 0, 96, 128 );

                $name = 'custom_' . time().'.png';
				imagepng($image, DOCROOT.'images/character/'.$name);
                imagedestroy($image);

                $this->user->avatar = $name;
                $this->user->update();
                return url::redirect('');
		}

}