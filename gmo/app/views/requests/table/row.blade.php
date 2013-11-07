<tr>
	<td><a href="/entrepreneur/requests/{{ $certReq->id }}">{{ $certReq->reference_id }}</a></td>
	<td>{{ $certReq->owner->fullName() }}</td>
	<td>{{ $certReq->signer->fullName() }}</td>
	<td>{{ $certReq->created_at }}</td>
	<?php if ($certReq->status == 'Pending') { ?>
		<td class="text-warning">{{ $certReq->status }}</td>
	<?php } else if ($certReq->status == 'Available') { ?>
		<td class="text-success">{{ $certReq->status }}</td>
	<?php } ?>
</tr>
