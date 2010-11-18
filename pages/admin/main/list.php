<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2>
		WP Survey And Quiz Tool - Survey/Quizzes 
		<a href="<?php echo WPSQT_URL_MAIN; ?>&type=quiz&action=addnew" class="button add-new-h2">Add New Quiz</a>
		<a href="<?php echo WPSQT_URL_MAIN; ?>&type=survey&action=addnew" class="button add-new-h2">Add New Survey</a>
	</h2>
	
	<form method="post" action="">
		<ul class="subsubsub">
			<li>
				<a href="<?php echo WPSQT_URL_MAIN; ?>" <?php if ($type == 'all') { ?>  class="current"<?php } ?> id="all_link">All <span class="count">(<?php echo $totalNo; ?>)</span></a> |			
			</li> 
			<li>
				<a href="<?php echo WPSQT_URL_MAIN; ?>&type=quiz" <?php if ($type == 'quiz') { ?>  class="current"<?php } ?> id="quiz_link">Quizzes <span class="count">(<?php echo $quizNo; ?>)</span></a> |			
			</li> 
			<li>
				<a href="<?php echo WPSQT_URL_MAIN; ?>&type=survey" <?php if ($type == 'survey') { ?>  class="current"<?php } ?>  id="survey_link">Surveys <span class="count">(<?php echo $surveyNo; ?>)</span></a>			
			</li> 
		</ul>
		
		<table class="widefat post fixed" cellspacing="0">
			<thead>
				<tr>
					<th class="manage-column" scope="col" width="25">ID</th>
					<th class="manage-column column-title" scope="col">Title</th>
					<th scope="col" width="75">Status</th>
					<th scope="col" width="75">Results</th>
				</tr>			
			</thead>
			<tfoot>
				<tr>
					<th class="manage-column" scope="col" width="25">ID</th>
					<th class="manage-column column-title" scope="col">Title</th>
					<th scope="col" width="75">Status</th>
					<th scope="col" width="75">Results</th>
				</tr>			
			</tfoot>
			<tbody>
				<?php foreach( $results as $result ){ ?>	
				<tr class="<?php if (isset($result['unviewed_count']) && $result['unviewed_count'] !== 0){?>unapproved<?php } else { ?>approved<?php  }?>">
					<th scope="row"><?php echo $result['id']; ?></th>
					<td class="column-title">
						<strong>
							<a class="row-title" href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=edit&id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a><?php if ($type == 'all'){?> <strong>- <?php echo ucfirst($result['type']); ?></strong><?php }?>
						</strong>
						<div class="row-actions">
							<span class="edit"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=edit&id=<?php echo $result['id']; ?>">Edit</a> | </span>
							<span class="section"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=sections&id=<?php echo $result['id']; ?>">Sections</a> | </span>
							<span class="questions"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=questions&id=<?php echo $result['id']; ?>">Questions</a> | </span>
							<span class="form"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=form&id=<?php echo $result['id']; ?>">Form</a> | </span>
							<?php if ($result['type'] == 'survey'){ ?>
							<span class="results"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=results&id=<?php echo $result['id']; ?>">Single Results</a> | </span>
							<span class="results"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=totalresults&id=<?php echo $result['id']; ?>">Total Results</a> | </span>
							<?php } else { ?>
							<span class="results"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=results&id=<?php echo $result['id']; ?>">Results</a> | </span>
							<?php } ?>
							<span class="delete"><a href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=delete&id=<?php echo $result['id']; ?>">Delete</a></span>
						</div>
					</td>
					<td><font color="<?php if ($result['status'] == 'enabled'){ ?>#00FF00<?php } else { ?>#FF0000<?php }?>"><?php echo ucfirst($result['status']); ?></font></td>
					<td class="comments column-comments">
						<div class="post-com-count-wrapper">
							<a class="post-com-count" title=" pending" href="<?php echo WPSQT_URL_MAIN;?>&type=<?php echo $result['type']; ?>&action=results&id=<?php echo $result['id']; ?>">
								<span class="comment-count"><?php echo $result['results']; ?></span>
							</a>
						</div>
					</td>
				</tr>				
				<?php } ?>
			</tbody>
		</table>
		
	</form>
	
</div>


<?php require_once WPSQT_DIR.'/pages/admin/shared/image.php'; ?>