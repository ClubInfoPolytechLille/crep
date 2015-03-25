VECTORS=$(shell echo *.svg)
PLACEHOLDERS=200
CUSTOM=mainBgPattern.png polyMap.png

COMPRESSED=$(shell cd orig; echo *.jpg)
MATRIXED=$(subst svg,png,$(VECTORS))
PLACEHOLDERS_PNG=$(addprefix ph,$(addsuffix .png,$(PLACEHOLDERS)))
DESC=Descriptif Concept Activites
DESC_JPG=$(addprefix desc,$(addsuffix .jpg,$(DESC)))

ALL=$(COMPRESSED) $(MATRIXED) $(PLACEHOLDERS_PNG) $(DESC_JPG) $(CUSTOM)

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

# DESCRIPTION
descDescriptif.jpg: orig/descDescriptif.jpg
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity center -composite -resize x400 -quality 90% $@

descConcept.jpg: orig/descConcept.png
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity center -composite -resize x400 -quality 90% $@

descActivites.jpg: orig/descActivites.jpg
	convert $< -set option:size '%[fx:min(w,h)]x%[fx:min(w,h)]' xc:none +swap -gravity east -composite -resize x400 -quality 90% $@

# PLACEHOLDERS
ph%.png:
	wget "http://fakeimg.pl/$(subst ph,,$(subst .png,,$@))/" -O $@
	optipng -o7 $@

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
