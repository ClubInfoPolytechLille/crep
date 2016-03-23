BOOTSTRAPVER=3.3.6
JQUERYVER=1.12.2
FONTS=robotech-gp.ttf robotaur.ttf

BOOTSTRAPNEEDED=js/bootstrap.min.js css/bootstrap.min.css fonts/glyphicons-halflings-regular.*
BOOTSTRAPNAME=bootstrap-$(BOOTSTRAPVER)-dist

all: redirs $(BOOTSTRAPNEEDED) js/jquery.min.js	js/konami.js $(addprefix fonts/,$(FONTS))
	cd img; make
	cd vid; make

# Redirs
%.php: pages/%.php
	echo "<?php require('index.php') ?>" > $@

redirs: $(REDIRS)

js/jquery.min.js:
	wget http://code.jquery.com/jquery-$(JQUERYVER).min.js -O $@

js/konami.js:
	wget https://gist.githubusercontent.com/scottstanfield/6450745/raw/ca320e86478f3026e138ab45f36820745bc2e6c0/cornify.js -O $@
	a=`sed 's/65,65/66,65/' $@`; echo "$$a" > $@

$(BOOTSTRAPNEEDED):
	wget https://github.com/twbs/bootstrap/releases/download/v$(BOOTSTRAPVER)/$(BOOTSTRAPNAME).zip -O $(BOOTSTRAPNAME).zip
	unzip $(BOOTSTRAPNAME).zip $(addprefix $(BOOTSTRAPNAME)/,$(BOOTSTRAPNEEDED))
	cp -rf $(BOOTSTRAPNAME)/* .
	rm -rf $(BOOTSTRAPNAME)*

fonts/robotech-gp.ttf:
	wget http://dl.dafont.com/dl/?f=robotech_gp -O robotech_gp.zip
	unzip robotech_gp.zip ROBOTECH\ GP.ttf
	mv ROBOTECH\ GP.ttf $@
	rm -rf robotech_gp.zip ROBOTECH\ GP.ttf

fonts/robotaur.ttf:
	wget http://dl.dafont.com/dl/?f=robotaur -O robotaur.zip
	unzip robotaur robotaur.ttf -d fonts
	rm -rf robotaur.zip

clean:
	cd img; make clean
	cd vid; make clean
	rm -rf $(BOOTSTRAPNEEDED) $(addprefix fonts/,$(FONTS)) js/jquery.min.js
