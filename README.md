perch2-fieldtypes-customlist
============================

The custom-data list field lets you add a selection box in your templates and populate it with data from arbitrary pairs of columns from the perch's database tables.


Installation
------------

Copy the `fieldtypes/customlist` directory from the repository to your `perch/addons/fieldtypes` directory.


Usage
-----

Use the following tag in your content templates:

    <perch:content type="customlist" page="<namespace>" region="<collection>" options="<labelsColumn>" values="<valuesColumn>" />

plus the standard tag attributes (*id*, *suppress*, etc.). This will show as a selection box inside
the administration backend. The box will be populated with options read from the `[PERCH_DB_PREFIX]<namespace>_<collection>` table inside the perch database. The option values will be read from the `<valuesColumn>` table column, and the option labels from `<labelsColumn>`. The selected option's value will be output to the rendered template.

---

**For instance**, if you want the user to be able to select a category from the shop app, you can write the following tag:

    <perch:content id="category" type="customlist" label="Select category"
                   page="shop" region="categories" options="categoryTitle" values="categorySlug"/>

The rule of thumb, if you don't want to wade through database tables to figure out the attributes' values, is:

1. Use the app name as the *page*
2. Use the entities name as the *region*
3. Use the predefined tag ids defined by the app for that entity as the options

---

If the `values` attribute is missing the value from `options` will be used both as the option's value and label.


###### What's with the attribute names?

The attribute names are purposedly copied from the perch standard *dataselect* tag, as I would like to make this fieldtype work as a transparent replacement for it, reverting to the standard page-content selection as a fallback case.


Roadmap
-------

One interesting feature to add would be the possibility to repeat the tag with the same id and different column names to extract other predefined or user-defined content from the selected entity.

Also, adding basic filtering of options à la *perch_ * _custom()* functions seems a sensible thing to do.

**Contributions are most welcome!**
