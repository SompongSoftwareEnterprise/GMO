<tr>
	<td><a href="/entrepreneur/requests/{{ $certReq->reference_id }}">{{ $certReq->reference_id }}</a></td>

	<td>{{ $certReq->first_name }}</td>
	<td>{{ $certReq->signer_id }}</td>
	<td>{{ $certReq->created_at }}</td>
	<?php if ($certReq->status == 'Pending') { ?>
		<td class="text-warning">{{ $certReq->status }}</td>
	<?php } else if ($certReq->status == 'Available') { ?>
		<td class="text-success">{{ $certReq->status }}</td>
	<?php } ?>
</tr>
