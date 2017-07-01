all:	checkconfig updateusers

checkconfig:
ifeq "$(wildcard config.php)" ""
	@echo =
	@echo =	You must create config.php file first
	@echo =	Start by copying config.sample.php
	@echo =
	@exit 1
endif

updateusers:
	cd users && $(MAKE)

rel:	release
release: assets releasetag packages

releasetag:
ifndef v
	# Must specify version as 'v' param
	#
	#   make rel v=1.1.1
	#
else
	#
	# Tagging it with release tag
	#
	git tag -a REL_${subst .,_,${v}}
	git push --tags
endif

packages:
ifndef v
	# Must specify version as 'v' param
	#
	#   make rel v=1.1.1
	#
else
	# generate the package
	git clone . twitter_client_${v}
	cd twitter_client_${v} && git checkout REL_${subst .,_,${v}}
	cd twitter_client_${v} && ${MAKE} updatecode
	cd twitter_client_${v}/users && ${MAKE} updatecode
	cd twitter_client_${v} && ${MAKE} assets 
	cd twitter_client_${v} && find ./ -name "\.git*" | xargs -n10 rm -r

	tar -c twitter_client_${v} |bzip2 > twitter_client_${v}.tar.bz2
	zip -r twitter_client_${v}.zip twitter_client_${v}
	rm -rf twitter_client_${v}
endif
