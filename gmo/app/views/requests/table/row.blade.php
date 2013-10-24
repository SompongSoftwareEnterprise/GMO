<tr>
	<td><a href="/entrepreneur/requests/{{ $certReq->id }}">{{ $certReq->reference_id }}</a></td>
	<td>{{ $certReq->owner->fullName() }}</td>
	<td>{{ $certReq->signer->fullName() }}</td>
	<td>{{ $certReq->created_at }}</td>
	<td>{{ $certReq->status }}</td>
</tr>