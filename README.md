# GitFS

Is an abstration to the git command line to help you to get logs, files tree....

## Some usage samples

# Clone a bare repository :

``` php
<?php

$repo = new \GitFS\BareRepository('/repos/my-repo-bare.git');
$repo->doClone('/repos/my-repo-cloned');
```

# List file into a repository folder :

``` php
<?php

$repositoryFs = new \GitFS\Model\Repository('/repos/my-repo-cloned');
$finder = new \GitFS\Util\Finder($repositoryFs);
$FilesCollection = $finder->in('related-dir')->search();

foreach ($FilesCollection->getFiles() as $file) {
	echo $file->getPath().'<br />'.$file->getContent();
	echo 'Hash: '.$file->getLastLog()->getHash();
}
```

# Get last log on `feature-branch`

``` php
<?php

$repositoryFs = new \GitFS\Model\Repository('/repos/my-repo-cloned');
$repositoryFs->setBranch('feature-branch');
$log = $repositoryFs->getLastLog();

echo $log->getMessage();
```
