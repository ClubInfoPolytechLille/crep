VECTORS=$(shell echo *.svg)
CUSTOM=mainBgPattern.png polyMap.png legoEducation.png

COMPRESSED=$(shell cd orig; echo *.jpg)
MATRIXED=$(subst svg,png,$(VECTORS))
DESC=Descriptif Concept Activites
DESC_JPG=$(addprefix desc,$(addsuffix .jpg,$(DESC)))

ALL=$(COMPRESSED) $(MATRIXED) $(DESC_JPG) $(CUSTOM)

all: $(ALL)

# CUSTOM
mainBgPattern.png:
	wget http://subtlepatterns.com/patterns/low_contrast_linen.png -O $@
	convert -negate $@ $@
	convert -channel B -evaluate multiply 1.2 $@ $@
	optipng -o7 $@

polyMap.png:
	wget "https://maps.googleapis.com/maps/api/staticmap?center=50.6074998,3.1373338&zoom=16&size=640x200&scale=2&maptype=roadmap&markers=color:red%7Clabel:P%7C50.6074998,3.1373338" -O $@
	optipng -o7 $@

legoEducation.png:
	wget "http://mms.businesswire.com/bwapps/mediaserver/ViewMedia?mgid=325079&vid=5&download=1" -O $@
	convert $@ -resize x200 $@
	optipng -o7 $@

# DESCRIPTION
descDescriptif.jpg: orig/descDescriptif.jpg
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity center -composite -resize x400 -quality 90% $@

descConcept.jpg: orig/descConcept.png
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity center -composite -resize x400 -quality 90% $@

descActivites.jpg: orig/descActivites.jpg
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity east -composite -resize x400 -quality 90% $@

# MATRIXED
# $(MATRIXED): $(subst png,svg,$@)
%.png: %.svg
	convert -background none $< $@
	optipng -o7 $@

# COMPRESSED
# $(COMPRESSED): orig/$@
%.jpg: orig/%.jpg
	convert -resize x1200 -strip -interlace Plane -gaussian-blur 0.05 -quality 90% $< $@

clean:
	rm -rf $(ALL)
