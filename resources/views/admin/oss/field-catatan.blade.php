@if($row->osstimeline[0]->catatan) <small>{{ $row->osstimeline[0]->catatan }}</small> @endif
@if($row->osstimeline[0]->link_pnbp)<br><small>Link PNBP : <a target="_blank" href="{{ $row->osstimeline[0]->link_pnbp }}">{{ $row->osstimeline[0]->link_pnbp }}</a></small> @endif
@if($row->osstimeline[0]->link_catatan_pupr)<br><small>Link Catatan PUPR : <a target="_blank" href="{{ $row->osstimeline[0]->link_catatan_pupr }}">{{ $row->osstimeline[0]->link_catatan_pupr }}</a></small> @endif
@if($row->osstimeline[0]->link_gistaru)<br><small>Link Gistaru : <a target="_blank" href="{{ $row->osstimeline[0]->link_gistaru }}">{{ $row->osstimeline[0]->link_gistaru }}</a></small> @endif
@if($row->osstimeline[0]->link_izin_terbit)<br><small>Link Izin Terbit : <a target="_blank" href="{{ $row->osstimeline[0]->link_izin_terbit }}">{{ $row->osstimeline[0]->link_izin_terbit }}</a></small> @endif
@if($row->osstimeline[0]->nomor_ku)<br><small>Nomor KU : <a target="_blank" href="{{ $row->osstimeline[0]->nomor_ku }}">{{ $row->osstimeline[0]->nomor_ku }}</a></small> @endif
