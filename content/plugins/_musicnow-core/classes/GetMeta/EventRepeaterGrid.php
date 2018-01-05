<?php



namespace Pyxl\MNC\GetMeta;

class EventRepeaterGrid {

	public function events() {

	}

	public function tracks() {
		$data = [];
		if ( have_rows( 'event_tracks' ) ) {
			while ( have_rows( 'event_tracks' ) ) : the_row();
				$data[] = (object) [
					'day' => get_sub_field( 'event_day' )
				];
				if ( have_rows( 'event_tracks' ) ) {
					while ( have_rows( 'events' ) ) : the_row();
						$data[] = (object) [
							'day' => get_sub_field( 'event_day' )
						];
					endwhile;
				} // end if().

			endwhile;
		} // end if().


		return (object) $data;
	}
}