<small>{{ $row->osstimeline[0]->catatan }}</small>
@if($row->osstimeline[0]->link_pnbr)<br><small>Link PNBR : <a target="_blank" href="{{ $row->osstimeline[0]->link_pnbr }}">{{ $row->osstimeline[0]->link_pnbr }}</a></small> @endif
@if($row->osstimeline[0]->link_catatan_pupr)<br><small>Link Catatan PUPR : <a target="_blank" href="{{ $row->osstimeline[0]->link_catatan_pupr }}">{{ $row->osstimeline[0]->link_catatan_pupr }}</a></small> @endif
@if($row->osstimeline[0]->link_kode_ajuan)<br><small>Link Kode Ajuan : <a target="_blank" href="{{ $row->osstimeline[0]->link_kode_ajuan }}">{{ $row->osstimeline[0]->link_kode_ajuan }}</a></small> @endif
@if($row->osstimeline[0]->nomor_ku)<br><small>Nomor KU : <a target="_blank" href="{{ $row->osstimeline[0]->nomor_ku }}">{{ $row->osstimeline[0]->nomor_ku }}</a></small> @endif
