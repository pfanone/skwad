<div id="inkbox_bug_modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<form id="report_bug_form" name="report_bug_form" class="modal-content" method="POST" action="/bug/report" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 id="inkbox_bug_modal_header" class="modal-title">Report an Issue</h4>
			</div>
			<div id="inkbox_bug_modal_body" class="modal-body">
				<h5>Describe what happened</h5>
				<textarea id="bug_description" name="bug_description" class="form-control" rows="5" required></textarea>
				<h5 class="marginT10">Upload a screenshot</h5>
				<label class="btn btn-block btn-file marginT10">
					<input name='upload_bug_image' type="file" accept=".png,.jpg,.jpeg" />
				</label>
			</div>
			<div id="inkbox_bug_modal_footer" class="modal-footer">
				<button id="inkbox_bug_modal_action_btn" type="submit" class="btn btn-primary">Submit Bug</button>
				<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</form><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<button class="report_bug">Report an Issue</button>

<style type="text/css">
	.report_bug {
		position: fixed;
		bottom: 0px;
		right: 10px;
		background: #fff;
		border: 1px solid #131200;
		border-radius: 2px;
		border-bottom: none;
	}

	.report_bug:hover {
		color: #F4F4F6;
		background-color: #62BBC1;
		border: 1px solid #62BBC1;
	}

	.btn-default {
		border: 1px solid #000;
	}
	.btn-default:hover {
		color: #F4F4F6;
		border: 1px solid #62BBC1;
	}

	.btn-primary {
		background-color: #62BBC1;
		border: 1px solid #62BBC1;
	}

	.btn-primary:hover {
		color: #62BBC1;
		background-color: #F4F4F6;
		border: 1px solid #62BBC1;
	}
</style>

<script type="text/javascript">
	$(".report_bug").on("click", function() {
		$("#inkbox_bug_modal").modal("show");
	});

	$( "#bug_description" ).focusin(function() { isFocused = 1; });
	$( "#bug_description" ).focusout(function() { isFocused = 0; });
</script>